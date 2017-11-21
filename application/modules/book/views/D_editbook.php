<div class="pt-10 pb-10 pl-50 pr-50">
	<div class="media">
		<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="50">
		<div class="media-body mt-7">
			<input type="hidden" name="user_id" id="user_id" value="<?php $name = $this->session->userdata('userData');
					echo $name['user_id']; ?>">
				<!-- <input type="text" name="book_id" id="books_id" value=""> -->
				<div id="books_id"></div>
			<h5 class="mt-0 mb-1 nametitle">Risa Sulistya</h5>
			<small>Fiksi</small>
		</div>
	</div>

	<div>
		<div class="mt-30 tulisjudul">
			<input type="text" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku" value="alhamdulillah">
		</div>

		<div class="tulisbuku mt-10">
			<textarea id="edit_book" name="edit_book">Alhamdulillah</textarea>
		</div>

	</div>
</div>

<div class="pull-right mb-10">
	<a class="mr-30" href="#" style="font-size: 18px;font-weight: bold;">Simpan ke Draft</a>
	<button type="submit" class="btnbeliskrg" href="#" style="padding: 10px 50px;"><span class="txtbtnbeliskrg" ">Publish</span></button>
</div>


<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>