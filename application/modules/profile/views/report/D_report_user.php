<?php $this->load->view('navbar/D_navbar');

$segg = $this->session->userdata('userData');
if (empty($user_result)){
    $user_result = array(
        'fullname' => $segg['fullname']
    );
}
?>

<div class="container mt-80 mb-40">

    <div class="row">
        <nav aria-label="breadcrumb">
            <?php
            $uri2 = $this->uri->segment(2);
            $urii2 = explode("-", $uri2);
            $uriii2 = array_pop($urii2);
            $uriiiii2 = implode(' ', $urii2);

            $uri3 = $this->uri->segment(3);
            $urii3 = explode("-", $uri3);
            $uriii3 = array_pop($urii3);
            $uriiiii3 = implode(' ', $urii3);

            $this->breadcumb_lib->add('Timeline', base_url());
            $this->breadcumb_lib->add('Profile', base_url('profile'));
            $this->breadcumb_lib->add('Laporan', base_url('laporan'));
            echo $this->breadcumb_lib->render();
            ?>
        </nav>
    </div>

    <div class="row bg-white pt-30 pb-30 rounded">
        <div class="container">
            <?php if ($segg['user_id'] == 1){ ?>
                <div class="row mb-20">
                    <div class="col-12">
                        <div class="form-group w-100">
                            <label for="searchReports" class="font-weight-bold h5 mb-5">Pencarian</label>
                            <input autocomplete="off" aria-label="Search" id="searchReports" aria-describedby="searchReport" class="form-control w-100" name="search_bbo" placeholder="Cari pengguna lainnya untuk melihat laporan disini..." type="search">
                            <ul class="dropdown-search w-100 search_result_report hide">
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-12">
                    <h1>Laporan Penjualan <b>"<?php echo $user_result['fullname']; ?>"</b></h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table id="tbl-report" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No. </th>
                    <th>Judul Buku</th>
                    <th>Harga</th>
                    <th>Total Terjual</th>
                    <th>Total Penjualan</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach ($book_result as $book){
                    $urlToUser = url_title($book['fullname'], 'dash', TRUE).'-'.$book['author_id'];
                    $urlToBook = url_title($book['title_book'], 'dash', TRUE).'-'.$book['book_id']; ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>" target="_blank" title="<?php echo $book['title_book']; ?>"><?php echo $book['title_book']; ?></a></td>
                        <td><?php echo "Rp. ".number_format($book['book_price'],0, ',', '.'); ?></td>
                        <td><?php echo $book['book_sold']; ?></td>
                        <td><?php echo "Rp. ".number_format($book['total_sold'],0, ',', '.'); ?></td>
                    </tr>

                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3" style="text-align:right">Total:</th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('footer/D_footer'); ?>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
