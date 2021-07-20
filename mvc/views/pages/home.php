<div>
	<form action="<?= $link?>User/search_friends" method="POST">
		Tìm bạn : 
		<input type="text" name="search_user">
		<input type="submit" value="Tìm kiếm">
	</form>
	<?php if(isset($data['result_search'])) { ?>
		<table border="1" width="80%">
			<caption>Kết quả tìm kiếm : </caption>
			<thead>
				<tr>
					<th>Tên</th>
					<th>SDT</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data['result_search'] as $row) { ?>
					<tr>
						<td><?= $row['user_name'] ?></td>
						<td><?= $row['user_phone'] ?></td>
						<td><a href="<?= $link?>Messenger/chat/<?= $row['user_id']?>">Chat</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
</div>
