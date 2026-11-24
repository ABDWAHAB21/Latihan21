ALTER TABLE login
    ADD COLUMN jenis_kelamin VARCHAR(20) NULL,
    ADD COLUMN provinsi_id VARCHAR(10) NULL,
    ADD COLUMN provinsi_nama VARCHAR(100) NULL,
    ADD COLUMN kabupaten_id VARCHAR(10) NULL,
    ADD COLUMN kabupaten_nama VARCHAR(100) NULL,
    ADD COLUMN kecamatan_id VARCHAR(10) NULL,
    ADD COLUMN kecamatan_nama VARCHAR(100) NULL,
    ADD COLUMN kelurahan_id VARCHAR(10) NULL,
    ADD COLUMN kelurahan_nama VARCHAR(100) NULL;
