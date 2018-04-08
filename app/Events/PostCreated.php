<?php

namespace App\Events;

use App\Post;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated implements ShouldBroadcast {
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $post;
	public $user;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Post $post, User $user) {
		$this->post = $post;
		$this->user = $user;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn() {
		return [
			new PrivateChannel('new-post'),
			new PrivateChannel('App.User.' . $this->post->user->id),
		];
	}

	public function broadcastWith() {
		return [
			'post' => array_merge($this->post->toArray(), [
				'user' => $this->post->user,
			]),
			'user' => $this->user,
		];
	}
}
