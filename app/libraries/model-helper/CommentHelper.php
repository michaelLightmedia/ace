<?php
class CommentHelper {


	public function getPostComment($post_id)
	{
		$tblPrefix = \DB::getTablePrefix();


		$query = "SELECT 
			a.*, 
			concat(b.firstname,' ',b.lastname) as author 
		FROM 
			".$tblPrefix."posts_comments as a 
		left join 
			".$tblPrefix."users as b ON a.user_id = b.id
		WHERE a.post_id = $post_id";


		$comments = \DB::select($query);

		 return $comments;
	}


	public function getPostCommentHTML( $post_id )
	{
		$comments = $this->getPostComment($post_id);

		if($comments):
			foreach( $comments as $comment ): ?>
				<!-- Comment -->
				<div class="msg-time-chat">
				  <a href="#" class="message-img"><?php echo HTML::image( UserHelper::avatar($comment->user_id, '40x40') ); ?></a>
				  <div class="message-body msg-in">
				      <span class="arrow"></span>
				      <div class="text">
				          <p class="attribution"><a href="#"><?php echo $comment->author; ?></a> at <?php echo date('H:i a, d M, Y', strtotime($comment->created_at)); ?></p>
				          <p><?php echo $comment->comment; ?></p>
				      </div>
				  </div>
				</div>
				<!-- /comment -->
			<?php
			endforeach;
		endif;
	}

	public static function test()
	{
		return 'test';
	}
}