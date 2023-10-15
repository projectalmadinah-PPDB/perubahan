<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Data Atas Nama {{$user->name}}</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
                <td>
                  <img src="{{ public_path('storage/' . $logo->school_logo)}}" alt="">
                </td>

								<td>
									Data Atas Nama #: {{$user->name}}<br />
									Created: {{$user->created_at}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									PPDB Al-Romusa, Inc.<br />
									Yogyakarta<br />
									Pondok Informatika Al-madinah
								</td>

								<td>
									{{$user->nomor}}.<br />
									{{$user->name}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Data Pribadi</td>

					<td>Check #</td>
				</tr>

        <tr class="details">
					<td>NIK</td>

					<td>{{ optional($user->student)->nik ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="details">
					<td>NISN</td>

					<td>{{ optional($user->student)->nisn ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="details">
					<td>Nama</td>

					<td>{{$user->name}}</td>
				</tr>

        <tr class="details">
					<td>Nomor Hp</td>

					<td>{{$user->nomor}}</td>
				</tr>

        <tr class="details">
					<td>Tanggal Lahir</td>

					<td>{{$user->tanggal_lahir}}</td>
				</tr>

        <tr class="details">
					<td>Tanggal Lahir</td>

					<td>{{ optional($user->student)->birthplace ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="details">
					<td>Jenis Kelamin</td>

					<td>{{$user->jenis_kelamin}}</td>
				</tr>

        <tr class="details">
					<td>Berapa Bersaudara</td>

					<td>{{ optional($user->parents)->no_of_sibling ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="details">
					<td>Anak Ke</td>

					<td>{{ optional($user->parents)->child_no ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="details">
					<td>Alamat</td>

					<td>{{ optional($user->student)->address ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="heading">
					<td>Data Org Tua</td>

					<td>#Check</td>
				</tr>

				<tr class="item">
					<td>Nama Ayah</td>

					<td>{{ optional($user->parents)->father_name ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="item">
					<td>Nomor Hp Ayah</td>

					<td>{{ optional($user->parents)->father_phone ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="item last">
					<td>Pekerjaan Ayah</td>

					<td>{{ optional($user->parents)->father_job ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="item">
					<td>Nama Ibu</td>

					<td>{{ optional($user->parents)->mother_name ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="item">
					<td>Nomor Hp Ibu</td>

					<td>{{ optional($user->parents)->mother_phone ?: 'Belum Lengkap' }}</td>
				</tr>

				<tr class="item last">
					<td>Pekerjaan Ibu</td>

					<td>{{ optional($user->parents)->mother_job ?: 'Belum Lengkap' }}</td>
				</tr>

        <tr class="item">
					<td>Pengahasilan Org Tua</td>

					<td>
            @if (optional($user->parents)->parent_earning == 'A' ?: 'Belum Lengkap')
              Kurang dari 1.000.000
            @elseif (optional($user->parents)->parent_earning == 'B' ?: 'Belum Lengkap') 
              1.000.000 - 5.000.000
            @elseif (optional($user->parents)->parent_earning == 'C' ?: 'Belum Lengkap') 
              5.000.000 - 10.000.000
            @elseif(optional($user->parents)->parent_earning == 'D' ?: 'Belum Lengkap')
            Lebih dari 10.000.000
            @endif
          </td>
				</tr>

			</table>
		</div>
	</body>
</html>
