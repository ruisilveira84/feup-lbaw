<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bid;
use App\Models\Auction;
use Illuminate\Auth\Access\HandlesAuthorization;

class BidPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Bid $bid)
    {
        // Allow viewing if the user is the owner of the bid or the auction
        return $user->id === $bid->user_id || $user->id === $bid->auction->user_id;
    }

    public function create(User $user)
    {
        // Allow bidding if the user is verified and the auction is active
        return $user->isVerified() && $user->canBid();
    }

    public function delete(User $user, Bid $bid)
    {
        // Allow deleting if the user is the owner of the bid
        return $user->id === $bid->user_id;
    }

    // Additional policy to ensure bids can only be placed on active auctions
    public function place(User $user, Auction $auction)
    {
        // Ensure the auction is active
        return $auction->status === 'active';
    }
}
