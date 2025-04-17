import React, { useState, useEffect } from 'react';

const ProductList = () => {
  const [products, setProducts] = useState([]);
  const [searchName, setSearchName] = useState('');
  const [category, setCategory] = useState('');
  const [tier, setTier] = useState('');

  const fetchProducts = async () => {
    let url = `http://localhost:3001/api/products/search?`;
    if (searchName) url += `name=${searchName}&`;
    if (category) url += `product_category=${category}&`;
    if (tier) url += `tier=${tier}&`;

    const res = await fetch(url);
    const data = await res.json();
    setProducts(data);
  };

  useEffect(() => {
    fetchProducts();
  }, [searchName, category, tier]);

  return (
    <div>
      <h1>Daftar Produk</h1>

      <input
        type="text"
        placeholder="Cari nama produk..."
        value={searchName}
        onChange={e => setSearchName(e.target.value)}
      />

      <select onChange={e => setCategory(e.target.value)} value={category}>
        <option value="">Semua Kategori</option>
        <option value="Rokok">Rokok</option>
        <option value="Obat">Obat</option>
        <option value="Lainnya">Lainnya</option>
      </select>

      <select onChange={e => setTier(e.target.value)} value={tier}>
        <option value="">Semua Tier</option>
        <option value="Non Member">Non Member</option>
        <option value="Basic">Basic</option>
        <option value="Premium">Premium</option>
      </select>

      <ul>
        {products.map(product => (
          <li key={product.id}>
            <h3>{product.name} ({product.product_category})</h3>
            <p>{product.description}</p>
            {product.prices.map(price => (
              <div key={price.id}>
                <strong>{price.unit}</strong>
                <ul>
                  {price.price_details.map(detail => (
                    <li key={detail.id}>{detail.tier}: Rp{detail.price}</li>
                  ))}
                </ul>
              </div>
            ))}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default ProductList;
