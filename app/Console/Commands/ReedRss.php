<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Feeds;
use Illuminate\Console\Command;

class ReedRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reed-rss';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $feed = Feeds::make('https://lifehacker.com/rss/');
        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );

        foreach ($data['items'] as $item) {

            $postTitle = $item->get_title();
            $postDescription = $item->get_description();
            $postLink = $item->get_permalink();
            $postPubDate = $item->get_date('Y-m-d H:i:s');


            // Перевірка наявності поста в базі за посиланням (наприклад, за полем 'link')
            $existingPost = Post::where('link', $postLink)->first();

            if (!$existingPost) {
                $categories = $item->get_categories();
                $categoryIds = [];

                foreach ($categories as $category) {
                    $categoryName = $category->get_label();
                    $existingCategory = Category::where('title', $categoryName)->first();

                    if (!$existingCategory) {
                        // Категорія не існує, створимо її
                        $newCategory = new Category();
                        $newCategory->title = $categoryName;
                        $newCategory->save();
                        $categoryId = $newCategory->id;
                    } else {
                        // Категорія вже існує
                        $categoryId = $existingCategory->id;
                    }

                    $categoryIds[] = $categoryId;
                }

                $post = Post::create(
                    [
                        'title' => $postTitle,
                        'description' => $postDescription,
                        'link' => $postLink,
                        'pub_date' => $postPubDate,
                        'source' => $data['title'],
                    ]
                );

                $post->categories()->attach($categoryIds);
            }
        }

        return 'RSS стрічка успішно спарсена та пости збережено в базі даних.';
    }
}
