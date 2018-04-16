<!-- Modal PIN AUTH -->
<div class="modal fade" id="pinauth-modal" tabindex="-1" role="dialog" aria-labelledby="PINmodal" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 100%; height: 100%; padding: 0; margin:0;">
		<div class="modal-content" style="height:100%; border-radius:0; color:#333; overflow:auto;border:none;">
			<div class="modal-body bg-purp p-0">
				<nav class="navbar color-layer">
					<a class="navbar-brand backcheck" href="javascript:void(0);" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left text-white"></i></a>
					<a href="#" class="text-white">Lupa PIN?</a>
				</nav>
				<div class="container mb-30">
					<div class="text-center">
						<div class="row mt-30">
							<div class="col-1"></div>
							<div class="col-10">
								<span class="text-white" style="font-size: 22px;font-weight: 600;">Masukkan PIN Keamanan</span>
							</div>
							<div class="col-1"></div>
						</div>
						<div class="row mt-50">
							<div class="col-1"></div>
							<div class="col-10">
								<div class="row">
									<form id="formPin" style="display: flex;">
										<div class="col-2 pr-5 pl-5">
											<input name="firstdigit" class="form-control text-center pininput" type="number" required id="firstdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="0">
										</div>
										<div class="col-2 pr-5 pl-5">
											<input name="secondtdigit" class="form-control text-center pininput" type="number" required id="secondtdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="1">
										</div>
										<div class="col-2 pr-5 pl-5">
											<input name="thirddigit" class="form-control text-center pininput" type="number" required id="thirddigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1"  tabindex="2">
										</div>
										<div class="col-2 pr-5 pl-5">
											<input name="fourthdigit" class="form-control text-center pininput" type="number" required id="fourthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="3">
										</div>
										<div class="col-2 pr-5 pl-5">
											<input name="fifthdigit" class="form-control text-center pininput" type="number" required id="fifthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="4">
										</div>
										<div class="col-2 pr-5 pl-5">
											<input name="sixthdigit" class="form-control text-center pininput" type="number" required id="sixthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="5">
										</div>
									</form>
								</div>
							</div>
							<div class="col-1"></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>