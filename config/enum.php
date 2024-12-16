<?php

namespace App\Enums;

use Symfony\Component\Console\Completion\Suggestion;

enum Categories: string
{
    case ALL = 'all';
    case UI = 'ui';
    case UX = 'ux';
    case ENHANCEMENT = 'enhancement';
    case BUG = 'bug';
    case FEATURE = 'feature';

    public function real(): string
    {
        return match ($this) {
            Categories::ALL => "All",
            Categories::UI => "UI",
            Categories::UX => "UX",
            Categories::ENHANCEMENT => "Enhancement",
            Categories::BUG => "Bug",
            Categories::FEATURE => "Feature",
        };
    }
}

enum Sorts: string
{
    case MOST_UPVOTES = 'most_upvotes';
    case LEAST_UPVOTES = 'least_upvotes';
    case MOST_COMMENTS = 'most_comments';
    case LEAST_COMMENTS = 'least_comments';

    public function real(): string
    {
        return match ($this) {
            Sorts::MOST_UPVOTES => 'Most Upvotes',
            Sorts::LEAST_UPVOTES => 'Least Upvotes',
            Sorts::MOST_COMMENTS => 'Most Comment',
            Sorts::LEAST_COMMENTS => 'Least Comment',
        };
    }
}

enum Status: string
{
    case SUGGESTION = 'suggestion';
    case PLANNED = 'planned';
    case IN_PROGRESS = 'in-progress';
    case LIVE = 'live';

    public function real(): string
    {
        return match ($this) {
            Status::LIVE => 'Live',
            Status::PLANNED => 'Planned',
            Status::SUGGESTION => 'Suggestion',
            Status::IN_PROGRESS => 'In-Progress',
        };
    }
}
