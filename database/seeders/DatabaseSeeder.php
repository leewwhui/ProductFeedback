<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Suzanne Chang', 'username' => 'upbeat1811', 'image' => '/user-images/image-suzanne.jpg'],
            ['name' => 'Thomas Hood', 'username' => 'brawnybrave', 'image' => '/user-images/image-thomas.jpg'],
            ['name' => 'Elijah Moss', 'username' => 'hexagon.bestagon', 'image' => '/user-images/image-elijah.jpg'],
            ['name' => 'James Skinner', 'username' => 'hummingbird1', 'image' => '/user-images/image-james.jpg'],
            ['name' => 'Anne Valentine', 'username' => 'annev1990', 'image' => '/user-images/image-anne.jpg'],
            ['name' => 'Ryan Welles', 'username' => 'voyager.344', 'image' => '/user-images/image-ryan.jpg'],
            ['name' => 'George Partridge', 'username' => 'soccerviewer8', 'image' => '/user-images/image-george.jpg'],
            ['name' => 'Roxanne Travis', 'username' => 'peppersprime32', 'image' => '/user-images/image-roxanne.jpg'],
            ['name' => 'Victoria Mejia', 'username' => 'arlen_the_marlin', 'image' => '/user-images/image-victoria.jpg'],
            ['name' => 'Zena Kelley', 'username' => 'velvetround', 'image' => '/user-images/image-zena.jpg'],
            ['name' => 'Jackson Barker', 'username' => 'countryspirit', 'image' => '/user-images/image-jackson.jpg'],
            ['name' => 'Javier Pollard', 'username' => 'warlikeduke', 'image' => '/user-images/image-javier.jpg'],
        ];

        // 插入用户数据
        $userModels = [];

        foreach ($users as $user) {
            $userModels[$user['username']] = User::create($user);
        }

        // 创建 Feedback 和评论
        $feedbacks = [
            [
                'title' => 'Add tags for solutions',
                'category' => 'enhancement',
                'upvotes' => 112,
                'status' => 'suggestion',
                'description' => 'Easier to search for solutions based on a specific stack.',
                'comments' => [
                    [
                        'content' => 'Awesome idea! Trying to find framework-specific projects within the hubs can be tedious',
                        'user' => 'upbeat1811',
                    ],
                    [
                        'content' => 'Please use fun, color-coded labels to easily identify them at a glance',
                        'user' => 'brawnybrave',
                    ],
                ],
            ],
            [
                'title' => 'Add a dark theme option',
                'category' => 'feature',
                'upvotes' => 99,
                'status' => 'suggestion',
                'description' => 'It would help people with light sensitivities and who prefer dark mode.',
                'comments' => [
                    [
                        'content' => 'Also, please allow styles to be applied based on system preferences...',
                        'user' => 'hexagon.bestagon',
                    ],
                    [
                        'content' => 'Second this! I do a lot of late night coding and reading...',
                        'user' => 'hummingbird1',
                        'replies' => [
                            [
                                'content' => "While waiting for dark mode, there are browser extensions...",
                                'replyingTo' => 'hummingbird1',
                                'user' => 'annev1990',
                            ],
                            [
                                'content' => "Good point! Using any kind of style extension is great...",
                                'replyingTo' => 'annev1990',
                                'user' => 'voyager.344',
                            ],
                        ],
                    ],
                ],
            ],
        ];


        foreach ($feedbacks as $feedbackData) {
            // 创建 Feedback
            $feedback = Feedback::create([
                'title' => $feedbackData['title'],
                'category' => $feedbackData['category'],
                'upvotes' => $feedbackData['upvotes'],
                'status' => $feedbackData['status'],
                'description' => $feedbackData['description'],
            ]);

            // 创建主评论和回复
            if (!empty($feedbackData['comments'])) {
                foreach ($feedbackData['comments'] as $commentData) {
                    $comment = Comment::create([
                        'content' => $commentData['content'],
                        'feedback_id' => $feedback->id,
                        'user_id' => $userModels[$commentData['user']]->id,
                        'parent_id' => null,
                        'reply_id' => null
                    ]);

                    // 创建回复
                    if (!empty($commentData['replies'])) {
                        foreach ($commentData['replies'] as $replyData) {
                            Comment::create([
                                'content' => $replyData['content'],
                                'feedback_id' => $feedback->id,
                                'user_id' => $userModels[$replyData['user']]->id,
                                'parent_id' => $comment->id,
                                'reply_id' => $userModels[$replyData['replyingTo']]->id,
                            ]);
                        }
                    }
                }
            }
        }


    }
}
