<?php

use App\Post;
use App\Tags;
use Faker\Generator as Faker;


$factory->define(App\TagsPost::class, function (Faker $faker) {
    return [
        'tag_id' => function (){
            $tag = Tags::all();
            $tags = $tag->toArray();
            $countTags = count($tags);
            $roundTagsId = rand(1, $countTags-1);
            $tagId = $tags[$roundTagsId]['id'];

            return $tagId;
        },

        'post_id' => function () {
            $post = Post::all();
            $posts = $post->toArray();
            $countPosts = count($posts);
            $roundPostsId = rand(1, $countPosts-1);
            $postId = $posts[$roundPostsId]['id'];
            return $postId;
        },
    ];
});
