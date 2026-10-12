<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function index()
    {
        $pendingComments = Comment::where('status', 'pending')->with(['user', 'article'])->latest()->get();
        $allComments = Comment::with(['user', 'article'])->latest()->paginate(15);
        $reports = Report::with(['user', 'reportable'])->latest()->paginate(15);

        return view('admin.moderation.index', compact('pendingComments', 'allComments', 'reports'));
    }

    public function updateCommentStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,pending,rejected',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update(['status' => $request->status]);

        return back()->with('success', 'Comment status updated successfully.');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted permanently.');
    }

    public function resolveReport(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update(['status' => $request->status ?? 'resolved']);

        return back()->with('success', 'Report status updated.');
    }
}
