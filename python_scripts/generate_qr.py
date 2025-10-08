# python_scripts/generate_qr.py
import pandas as pd
import qrcode
import os
import sys
import json

# Argumen: excel_path [output_dir]
excel_path = sys.argv[1] if len(sys.argv) > 1 else "excel/data_karyawan.xlsx"
output_dir = sys.argv[2] if len(sys.argv) > 2 else "public/qr_code"

# Validasi file
if not os.path.exists(excel_path):
    print(json.dumps({"error": f"Excel file not found: {excel_path}"}))
    sys.exit(1)

os.makedirs(output_dir, exist_ok=True)

# Baca excel (sheet pertama)
df = pd.read_excel(excel_path, dtype=str).fillna('')

# Pastikan kolom minimal ada
required_cols = ["nik", "nama_lengkap", "nama_departemen", "nama_role"]
for c in required_cols:
    if c not in df.columns:
        print(json.dumps({"error": f"Missing column: {c}"}))
        sys.exit(1)

results = []

for _, row in df.iterrows():
    nik = str(row["nik"]).strip()
    nama = str(row["nama_lengkap"]).strip()
    nama_departemen = str(row["nama_departemen"]).strip()
    nama_role = str(row["nama_role"]).strip()
    nama_jabatan = str(row.get("nama_jabatan", "")).strip()
    tanggal_masuk = str(row.get("tanggal_masuk", "")).strip()

    payload = {
        "nik": nik,
        "nama_lengkap": nama,
        "nama_departemen": nama_departemen,
        "nama_role": nama_role,
        "nama_jabatan": nama_jabatan,
        "tanggal_masuk": tanggal_masuk,
    }

    # QR content = JSON string
    qr_text = json.dumps(payload, ensure_ascii=False)

    # generate QR
    qr = qrcode.QRCode(
        version=2,
        error_correction=qrcode.constants.ERROR_CORRECT_M,
        box_size=6,
        border=4,
    )
    qr.add_data(qr_text)
    qr.make(fit=True)
    img = qr.make_image(fill_color="black", back_color="white")

    filename = f"{nik}.png"
    filepath = os.path.join(output_dir, filename)
    img.save(filepath)

    results.append({
        "nik": nik,
        "nama_lengkap": nama,
        "nama_departemen": nama_departemen,
        "nama_role": nama_role,
        "nama_jabatan": nama_jabatan,
        "tanggal_masuk": tanggal_masuk,
        "qr_file": f"qr_code/{filename}"
    })

# Print hasil JSON ke stdout (dibaca Laravel)
print(json.dumps(results, ensure_ascii=False))
