<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Garden;
use App\Models\GardenComment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingGardens = Garden::where('status', 'pending')->latest()->get();
        $approvedGardens = Garden::where('status', 'approved')->latest()->get();
        $users = User::latest()->get();

        return view('admin.dashboard', compact('pendingGardens', 'approvedGardens', 'users'));
    }

    public function approveGarden(Garden $garden)
    {
        $garden->update(['status' => 'approved']);
        return back()->with('success', 'Garden approved successfully.');
    }

    public function deleteGarden(Garden $garden)
    {
        $garden->delete();
        return back()->with('success', 'Garden deleted.');
    }

    public function deleteUser(User $user)
    {
        if ($user->is_admin) {
            return back()->with('error', 'Cannot delete an admin user.');
        }

        GardenComment::where('author_name', $user->name)->delete();

        $userGardens = Garden::where('user_id', $user->id)->get();
        foreach ($userGardens as $userGarden) {
            // Also delete any comments/likes attached to these gardens
            GardenComment::where('garden_id', $userGarden->id)->delete();
            \App\Models\GardenLike::where('garden_id', $userGarden->id)->delete();
            $userGarden->delete();
        }

        $user->delete();
        return back()->with('success', 'User and all associated data deleted.');
    }

    public function deleteComment(GardenComment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted.');
    }
}
