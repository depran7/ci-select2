<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Codeigniter | Select 2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>

<body>
	<div class="container mt-5  d-flex justify-content-center">
		<div>
			<h1>Cari Mahasiswa</h1>
			<div style="width: 18rem;">
				<form action="">
					<select class="nrp-select2 form-control" name="states">
					</select>
				</form>

				<div class="card mt-5">
					<div class="card-body">
						<h5 class="card-title" id="nama-mhs">Nama</h5>
						<h6 class="card-subtitle mb-2 text-muted" id="kontak-mhs">Kontak</h6>
						<p class="card-text" id="alamat-mhs">lorem</p>
					</div>
				</div>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

	<script>
		$(document).ready(function () {
			$('.nrp-select2').select2({
				// minimumInputLength: 10,//optional
				//maximumInputLength: 10, //optional
				allowClear: true,
				placeholder: 'masukkan nrp',
				templateSelection: function (data, container) { // untuk memetakan data pada option select2nya 
					$(data.element).attr('data-id', data.id);
					$(data.element).attr('data-nrp', data.nrp);
					$(data.element).attr('data-nama', data.nama);
					$(data.element).attr('data-kontak', data.kontak);
					$(data.element).attr('data-alamat', data.alamat);
					return data.text;
				},
				ajax: { //mencari data ke controller
					dataType: 'json',
					url: '<?= base_url("mhs")?>',
					delay: 800,

					data: function (params) {
						return {
							/*
							key: data_yang_dicari;
							key nya disesuaikan dengan kebutuhan 
							*/
							
							nrp: params.term
						}
					},
					processResults: function (data, page) {
						return {
							results: $.map(data.mhs, function (
							mhs) { // untuk meyimpan data yang telah dipetakan
								return {
									id: mhs.id, //key id wajib ada
									text: mhs.nrp, //key text wajib ada (digunakan untuk menampilkan hasil pencarian)
									nama: mhs.nama,
									kontak: mhs.kontak,
									alamat: mhs.alamat
								};
							})
						};
					},
				},


			}).on('select2:select', function (evt) {

				//mengambil data pilihan yang telah disimpan pada pemetaan data
				let nama = $(".nrp-select2 option:selected").data('nama');
				let kontak = $(".nrp-select2 option:selected").data('kontak');
				let alamat = $(".nrp-select2 option:selected").data('alamat');

				//menampilkan data sesuai kebutuhan (dalam kasus ini ditampilkan pada CARD)
				$('#nama-mhs').text(nama);
				$('#kontak-mhs').text(kontak);
				$('#alamat-mhs').text(alamat);
			});
		});

	</script>

</body>

</html>
