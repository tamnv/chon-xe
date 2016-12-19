<?php

$keypass = 'Xe@2017_01_01#XE';
$codename = 'XEONLINE';

$all_ht_params = array(
  'codename' => $codename,
);
$all_chuyen_di = array(
  'HanhTrinhId' => 154,
  'KhungGioId' => 0,
  'NgayDi' => '2016-12-20',
  'ThongTinKhachHang' => '',
);
$chuyen_di = array(
  'ChuyenDiId' => 54711,
);
$sodo_ghexe = array(
  'ChuyenDiId' => 54711
);
$params_datve = array(
  'ChuyenDiId' => '54711',
  'SoDoGheId' => 4460,
  'GiaTien' => 130000,
  'isThanhToan' => 0,
  'TenKhach' => 'Tam',
  'DienThoai' => '099999',
  'TenDiemDon' => 'BigC',
  'TenDiemTra' => 'BigC',
  'GhiChu' => 'Ghichu',
);

$input_all_ht = $keypass . ',' . $codename;
$input_all_chuyendi = $keypass . ',' . $codename . ',' . implode(',', $all_chuyen_di);
$input_chuyendi = $keypass . ',' . $codename . ',' . implode(',', $chuyen_di);
$input_datve = $keypass . ',' . $codename . ',' . implode(',', $params_datve);

$checksum = md5($input_chuyendi);
$checksum_dv = md5($input_datve);

echo $checksum_dv;
$url_params = http_build_query($params_datve);
$url_params_chuyendi = http_build_query($all_chuyen_di);

$url = 'http://xe.chonve.vn/lapi/GetAllHanhTrinh?codename=' . $codename . '&checksum=' . $checksum;

$url_chuyendi = 'http://xe.chonve.vn/lapi/GetAllChuyenDi?codename=' . $codename . '&' . $url_params_chuyendi . '&checksum=' . $checksum;
$url_getchuyendi = 'http://xe.chonve.vn/lapi/GetChuyenDi?codename=' . $codename . '&ChuyenDiId=54711&checksum=' . $checksum;
$ulr_getsodoghexe = 'http://xe.chonve.vn/lapi/GetSoDoGheXe?codename=' . $codename . '&ChuyenDiId=54711&checksum=' . $checksum;
$url_datve = 'http://xe.chonve.vn/lapi/DatVe?codename=' . $codename . '&' . $url_params . '&checksum=' . $checksum_dv;

$result = file_get_contents($url_datve);
// Will dump a beauty json :3
var_dump(json_decode($result, true));
//
