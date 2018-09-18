<div class="modal fade" id="view-statistik" tabindex="-1" role="dialog" aria-labelledby="view-statistikLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="height: 100vh;">
            <div class="modal-header">
                <h5 class="modal-title" id="view-statistikLabel">Statistik</strong></h5><button type="button" class="closes" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row pb-30">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_book.png'); ?>" class="mr-10">Total Buku <span class="float-right font-weight-bold"><?php echo $statistik['data']['book_made']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_sale.png'); ?>" class="mr-10">Total Penjualan <span class="float-right font-weight-bold"><?php echo $statistik['data']['total_sold']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_sold.png'); ?>" class="mr-10">Buku Terjual <span class="float-right font-weight-bold"><?php echo $statistik['data']['book_sold']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_viewer.png'); ?>" class="mr-10">Total Pengunjung <span class="float-right font-weight-bold"><?php echo $statistik['data']['total_visitor']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_friend.png'); ?>" class="mr-10">Teman <span class="float-right font-weight-bold"><?php echo $statistik['data']['followers']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                                <a href="#" class="c-list_border_bottom">
                                    <li class="list-group-item p-20"><img src="<?php echo base_url('public/img/assets/stats/icon_stat_since.png'); ?>" class="mr-10">Bergabung Sejak <span class="float-right font-weight-bold"><?php echo $statistik['data']['register_date']; ?> <i class="fa fa-chevron-right ml-10" aria-hidden="true"></i></span></li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
