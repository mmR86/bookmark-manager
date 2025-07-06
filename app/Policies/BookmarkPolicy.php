<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;

class BookmarkPolicy
{
    /**
     * Policy for deleteing bookmarks
     */
    public function delete(User $user, Bookmark $bookmark): bool
    {
        return $user->id == $bookmark->user_id;
    }
}
