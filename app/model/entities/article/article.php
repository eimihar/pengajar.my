<?php
namespace Article;

class Article extends \EloquentUtils\Extension\Base
{
	protected $table = "article";

	public function tag()
	{
		return $this->hasMany('\article\tag', "articleId");
	}

	public function comment()
	{
		return $this->hasMany('\article\comment', "articleId");
	}

	public function reference()
	{
		return $this->hasMany('\article\reference', "articleId");
	}

	public function histories()
	{
		return $this->hasMany('\article\history', "articleId");
	}

	public function getCategory()
	{
		$categories = \article\category::all()->toList('id', 'title');
		return $categories[$this->categoryId];
	}
	
	/* modify article save, so it'll create an article_history all along */
	public function save(array $options = array())
	{
		parent::save($options);

		$history = new \article\history();
		$history->articleId = $this->id;
		$history->title = $this->title;
		$history->body = $this->body;
		$history->publishedDate = $this->publishedDate;
		$history->categoryId = $this->categoryId;
		$history->save();
	}

	/* delete all along with the relation. */
	public function delete()
	{
		$this->tag->delete();
		$this->comment->delete();
		$this->reference->delete();
		return parent::delete();
	}

	public function getSlugifiedTitle()
	{
		return str_replace(" ","-",strtolower($this->title));
	}

	public function getSimplifiedBody($limit = 40)
	{
		$body = strip_tags($this->body);
		$body = explode(" ",$body);

		$words = 0;
		foreach($body as $text)
		{
			$words++;
			if($words > $limit)
				break;

			$newBody[] = $text;
		}

		return implode(" ",$newBody)."...";
	}

	public function getTags()
	{
		return tag::where("articleId", $this->id)->get();
	}

	public function addTag($tags, $delete = false)
	{
		if($delete)
			\article\tag::where('articleId', $this->id)->delete();

		if($tags == "")
			return;

		if(is_string($tags))
			$tags = explode(",",$tags);

		foreach($tags as $tag)
		{
			if(\article\tag::where("name", $tag)->where("articleId", $this->id)->first())
				continue;

			$tag = new \article\tag(['name'=>trim($tag), 'articleId'=>$this->id]);
			$tag->save();
		}

		return;
	}

	public function addComment($userName, $email, $body)
	{
		$comment = new \article\comment;
		$comment->userName = $userName;
		$comment->userEmail = $email;
		$comment->body = $body;
		$comment->articleId = $this->id;
		$comment->save();

		return $this;
	}

	public function addReference(array $reference)
	{
		// delete all reference first.
		$this->reference->delete();

		if(count($reference) == 0)
			return;

		foreach($reference as $val)
		{
			if($val == "")
				continue;

			$ref = new \article\reference(['articleId'=> $this->id, 'value'=> $val]);
			$ref->save();
		}

		return $this;
	}
}