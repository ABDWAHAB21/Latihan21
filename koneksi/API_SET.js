const API_BASE = "https://www.emsifa.com/api-wilayah-indonesia/api";

const provinsiSelect = document.getElementById("provinsi");
const kabupatenSelect = document.getElementById("kabupaten");
const kecamatanSelect = document.getElementById("kecamatan");
const kelurahanSelect = document.getElementById("kelurahan");
const errorElement = document.getElementById("error");

function setOptions(select, placeholder, items) {
    select.innerHTML = "";

    const placeholderOption = document.createElement("option");
    placeholderOption.value = "";
    placeholderOption.textContent = placeholder;
    select.appendChild(placeholderOption);

    items.forEach((item) => {
        const option = document.createElement("option");
        option.value = item.id;
        option.textContent = item.name;
        option.dataset.name = item.name;
        select.appendChild(option);
    });
}

function setHiddenValue(id, value) {
    document.getElementById(id).value = value;
}

async function getWilayah(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error(`Permintaan data wilayah gagal (${response.status})`);
    }

    return response.json();
}

function selectedName(select) {
    return select.options[select.selectedIndex].dataset.name || "";
}

async function loadOptions(select, placeholder, url, errorMessage) {
    try {
        errorElement.textContent = "";
        const items = await getWilayah(url);
        setOptions(select, placeholder, items);
    } catch (error) {
        errorElement.textContent = errorMessage;
        console.error(error);
    }
}

provinsiSelect.addEventListener("change", async () => {
    setHiddenValue("provinsi_id", provinsiSelect.value);
    setHiddenValue("provinsi_nama", selectedName(provinsiSelect));
    setHiddenValue("kabupaten_id", "");
    setHiddenValue("kabupaten_nama", "");
    setHiddenValue("kecamatan_id", "");
    setHiddenValue("kecamatan_nama", "");
    setHiddenValue("kelurahan_id", "");
    setHiddenValue("kelurahan_nama", "");

    kabupatenSelect.disabled = !provinsiSelect.value;
    kecamatanSelect.disabled = true;
    kelurahanSelect.disabled = true;
    setOptions(kabupatenSelect, "-- Pilih Kabupaten/Kota --", []);
    setOptions(kecamatanSelect, "-- Pilih Kecamatan --", []);
    setOptions(kelurahanSelect, "-- Pilih Kelurahan --", []);

    if (provinsiSelect.value) {
        await loadOptions(
            kabupatenSelect,
            "-- Pilih Kabupaten/Kota --",
            `${API_BASE}/regencies/${encodeURIComponent(provinsiSelect.value)}.json`,
            "Data kabupaten/kota gagal dimuat. Periksa koneksi internet."
        );
    }
});

kabupatenSelect.addEventListener("change", async () => {
    setHiddenValue("kabupaten_id", kabupatenSelect.value);
    setHiddenValue("kabupaten_nama", selectedName(kabupatenSelect));
    setHiddenValue("kecamatan_id", "");
    setHiddenValue("kecamatan_nama", "");
    setHiddenValue("kelurahan_id", "");
    setHiddenValue("kelurahan_nama", "");

    kecamatanSelect.disabled = !kabupatenSelect.value;
    kelurahanSelect.disabled = true;
    setOptions(kecamatanSelect, "-- Pilih Kecamatan --", []);
    setOptions(kelurahanSelect, "-- Pilih Kelurahan --", []);

    if (kabupatenSelect.value) {
        await loadOptions(
            kecamatanSelect,
            "-- Pilih Kecamatan --",
            `${API_BASE}/districts/${encodeURIComponent(kabupatenSelect.value)}.json`,
            "Data kecamatan gagal dimuat. Periksa koneksi internet."
        );
    }
});

kecamatanSelect.addEventListener("change", async () => {
    setHiddenValue("kecamatan_id", kecamatanSelect.value);
    setHiddenValue("kecamatan_nama", selectedName(kecamatanSelect));
    setHiddenValue("kelurahan_id", "");
    setHiddenValue("kelurahan_nama", "");

    kelurahanSelect.disabled = !kecamatanSelect.value;
    setOptions(kelurahanSelect, "-- Pilih Kelurahan --", []);

    if (kecamatanSelect.value) {
        await loadOptions(
            kelurahanSelect,
            "-- Pilih Kelurahan --",
            `${API_BASE}/villages/${encodeURIComponent(kecamatanSelect.value)}.json`,
            "Data kelurahan gagal dimuat. Periksa koneksi internet."
        );
    }
});

kelurahanSelect.addEventListener("change", () => {
    setHiddenValue("kelurahan_id", kelurahanSelect.value);
    setHiddenValue("kelurahan_nama", selectedName(kelurahanSelect));
});

loadOptions(
    provinsiSelect,
    "-- Pilih Provinsi --",
    `${API_BASE}/provinces.json`,
    "Data provinsi gagal dimuat. Periksa koneksi internet."
);
