<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Auction;

class AuctionPolicy
{
    public function view(User $user, Auction $auction): bool
    {
        // Any authenticated user can view auctions
        return true;
    }

    public function create(User $user): bool
    {
        // Any authenticated user can create an auction
        return true;
    }

    public function update(User $user, Auction $auction): bool
    {
        // Only the owner of the auction can update it
        return $user->id === $auction->user_id;
    }

    public function delete(User $user, Auction $auction): bool
    {
        // Only the owner of the auction can delete it
        return $user->id === $auction->user_id;
    }
}
