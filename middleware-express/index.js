const express = require('express');
const axios = require('axios');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const LARAVEL_API = 'http://localhost:8000/api/products';

app.get('/api/products', async (req, res) => {
  try {
    const response = await axios.get(LARAVEL_API);
    res.json(response.data);
  } catch (err) {
    res.status(500).json({ message: 'Gagal mengambil data dari Laravel' });
  }
});

app.post('/api/products', async (req, res) => {
  try {
    const response = await axios.post(LARAVEL_API, req.body);
    res.status(201).json(response.data);
  } catch (err) {
    res.status(500).json({ message: 'Gagal menyimpan data' });
  }
});

app.put('/api/products/:id', async (req, res) => {
  try {
    const response = await axios.put(`${LARAVEL_API}/${req.params.id}`, req.body);
    res.json(response.data);
  } catch (err) {
    res.status(500).json({ message: 'Gagal mengupdate data' });
  }
});

app.delete('/api/products/:id', async (req, res) => {
  try {
    const response = await axios.delete(`${LARAVEL_API}/${req.params.id}`);
    res.json(response.data);
  } catch (err) {
    res.status(500).json({ message: 'Gagal menghapus data' });
  }
});

app.get('/api/products/search', async (req, res) => {
  try {
    const response = await axios.get(`${LARAVEL_API}/search`, { params: req.query });
    res.json(response.data);
  } catch (err) {
    res.status(500).json({ message: 'Gagal mencari data' });
  }
});

app.listen(3001, () => {
  console.log('Middleware Express running di http://localhost:3001');
});
