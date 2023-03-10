<?php
namespace App\Table;

use \PDO;
use App\Table\Table;
use App\Model\Category;

final class CategoryTable extends Table{

    protected $table = "category";

    protected $class = Category::class;

    /**@param App\Model\Post[] $posts */
    public function hydratePosts (array $posts): void
    {
        $postsByID = [];
        foreach($posts as $post){
            $post->setCategories([]);
            $postsByID[$post->getID()] = $post;
        }
        $categories = $this->pdo
            ->query('SELECT c.*, pc.post_id
                    FROM post_category pc
                    JOIN category c ON c.id = pc.category_id
                    WHERE pc.post_id IN (' . implode(',' , array_keys($postsByID)) . ')'
            )->fetchALL(PDO::FETCH_CLASS, $this->class);

        foreach ($categories as $category) {
            $postsByID[$category->getPostID()]->addCategory($category);
        }
    }

    public function all (): array 
    {
        return $this->queryAndFetchAll("SELECT * from {$this->table} ORDER BY id ASC");
    }

    public function list (): array
    {
        $categories = $this->queryAndFetchAll("SELECT * from {$this->table} ORDER BY name DESC");
        $results = [];
        foreach ($categories as $category){
            $results[$category->getID()] = $category->getName();
        }
        return $results;
    }

}