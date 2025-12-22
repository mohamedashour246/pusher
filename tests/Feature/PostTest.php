<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    public function test_visit_empty_posts()
    {
//        $user = User::factory()->create();
        $user = User::create([
            'name' => 'ali',
            'email' => 'a@l.com',
            'password' => bcrypt('555555')
        ]);
        $response = $this->actingAs($user)->get('posts');
        $response->assertSee('No posts');

        $response->assertStatus(200);
    }

    public function test_visit_not_empty_posts()
    {
        $user = User::create([
            'name' => 'ali',
            'email' => 'a@la.com',
            'password' => bcrypt('555555')
        ]);

        $post = Post::factory(3)->create(['user_id' => $user->id]);

//       $post = Post::create([
//            'name' => 'post1',
//            'body' => 'welcome first',
//            'user_id' => 1
//        ]);

        $response = $this->actingAs($user)->get('posts');
      //  $response->assertDontSee('no posts');
      //  $response->assertStatus(200);

        if($response->status() == 200) {
            $response->assertViewHas('posts',function ($item) use ($post){
                  return $item->contains($post->last());
            });
        }
    }
}
