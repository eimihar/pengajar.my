<?php
namespace Article;

class Category extends \EloquentUtils\Extension\Base
{
	protected $table = "category";

	public function hasArticle()
	{
		return article::where('categoryId', $this->id)->count() > 0;
	}

	public function getLatestArticle()
	{
		$article = article::take(1)->where("categoryId", $this->id)->orderBy("created_at","desc")->first();

		return $article;
	}

}