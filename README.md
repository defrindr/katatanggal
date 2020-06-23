# Kata Tanggal
Kata tanggal adalah sebuah library untuk mengubah tanggal kedalam sebuh teks bahasa Indonesia.

## How to install
```shell
composer require defrindr/katatanggal
```

## Example
```php
require_once __DIR__ .'/vendor/autoload.php';

use defrindr\katatanggal\katatanggal;

$tanggal = new katatanggal("19-05-2002");
echo $tanggal->get();

// Output :
// Hari Minggu, Tanggal Sembilan Belas Bulan Lima  Tahun Dua Ribu Dua

```

## Contribution
Akan terasa sangat menyenangkan jika ada yang membantu untuk mengembangkan library ini.

