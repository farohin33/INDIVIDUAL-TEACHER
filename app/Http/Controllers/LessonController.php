<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Lesson;
use App\Services\AI\GrokService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $grok;

    public function __construct(GrokService $grok)
    {
        $this->grok = $grok;
    }

 public function generateFromTopic(Topic $topic)
{
    try {
        // Updated Prompt for English output
        $prompt = "Topic: '{$topic->name}'. 
        Act as an expert educator. Provide a brief learning summary.
        STRICT FORMAT:
        1. THE ESSENCE (1-2 clear sentences).
        2. KEY TAKEAWAYS (Bullet points, max 3).
        3. REAL-WORLD EXAMPLE (A practical application).
        Language: English only. Keep it concise and easy to remember.";

        $content = $this->grok->ask($prompt);

        $lesson = Lesson::updateOrCreate(
            ['topic_id' => $topic->id],
            [
                'title' => $topic->name,
                'content' => $content
            ]
        );

        return redirect()->route('lesson.show', $lesson->id);

    } catch (\Exception $e) {
        return back()->with('error', 'AI Generation failed: ' . $e->getMessage());
    }
}
    public function show(Lesson $lesson)
    {
        return view('lesson.show', compact('lesson'));
    }
}