<div class="user">

	<p>Cтена пользователя <?=$data[user][name]?> </p>
	<img src="<?=$data[user][picture]?>">
	<?php 
	if($_SESSION[id] == $data[user][id] && $_SESSION[id] != '' ): ?>
 		<form method="post" action="/wall/addpost" class="clearfix">
 			<textarea name="text" class="new-post"></textarea>
			<button type="submit" class="btn">отправить</button>
 		</form>
	<?php endif;?>
 </div>
<?php 
// выводим все посты
	foreach ($data[posts] as $post):?>
		<div class="post">
			<i><?=$post[time]?></i>
			<p><?=$post['text'];?></p> 
				
			<?php if(isset($_SESSION[id])) :?> 
				<a class = 'showForm' target='<?=$post[id]?>'>комментировать</a>
			<?php endif; ?>
			<div id="form<?=$post[id]?>" class='targetDiv'>
			<form method="post" action="/wall/addcomment" class="clearfix">
				<input type="hidden" name="post" value="<?=$post[id]?>">
				<input type="hidden" name="autor" value="<?=$post[user_id]?>">
				<input type="hidden" name="commentator" value="<?=$_SESSION[id]?>">
	 			<textarea name="text" class="new-comment"></textarea>
				<button type="submit" class="btn">отправить</button>
			</form>
			</div>
			<!-- если есть комментарии -->
			<?php if(isset($data[comments][$post[id]])):?>	
				<a class = 'showBranch' target='<?=$post[id]?>'>показать комментарии</a>		
				<div id='post<?=$post[id]?>' class='branch targetDiv'>
					<?php
					foreach ($data[comments][$post[id]] as $comment):?>
						<div class="comment clearfix ">
							<img src="<?=$data[users][$comment[commentator]][picture]?>">
							<div class="comment-info">
								<i><?=$comment[time]?></i>
								<a class="username" href="/wall/<?=$comment[commentator]?>"><?=$data[users][$comment[commentator]][name]?></a>
								<p><?=$comment[text]?></p>
								<?php if(isset($_SESSION[id])) :?>
									<a class = 'showsubForm' target='<?=$comment[id]?>'>комментировать</a>
								<?php endif; ?>
							</div>
						</div>
						<div id="subform<?=$comment[id]?>" class='targetDiv'>
						<!-- форма комментировать комментарии -->
							<form method="post" action="/wall/addsubcomment" class="clearfix">
								<input type="hidden" name="post" value="<?=$post[id]?>">
								<input type="hidden" name="autor" value="<?=$post[user_id]?>">
								<input type="hidden" name="commentator" value="<?=$_SESSION[id]?>">
								<input type="hidden" name="subcomment" value="<?=$comment[id]?>">
		 						<textarea name="text" class="new-comment"></textarea>
								<button type="submit" class="btn ">отправить</button>
							</form>
						</div>
						<?php if(isset($data[subcomments][$comment[id]])){
							foreach ($data[subcomments][$comment[id]] as $subcomment):?>
							<div class="subbranch">								
								<div class="comment clearfix ">
									<img src="<?=$data[users][$comment[commentator]][picture]?>">
									<div class="comment-info">
									<i><?=$subcomment[time]?></i>
									<a class="username" href="/wall/<?=$comment[commentator]?>"><?=$data[users][$comment[commentator]][name]?></a>
									<p><?=$subcomment[text]?></p>
									</div>
								</div>
							</div>
							<?php endforeach;
						} ?>
					<?php endforeach;?>
				</div>			
			<?php else : ?>
				<i>комментариев нет</i>
		<?php endif; ?>
	</div>			
<?php endforeach; ?>


