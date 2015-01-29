<?php namespace HMCT\Products\Repo;


interface ProductRepositoryInterface {
    public function getAll();
    public function createProduct($input);
    public function getById($id);
    public function getBySlug($slug);
    public function updateProduct($id, $input);
    public function getCategory($category);
}
