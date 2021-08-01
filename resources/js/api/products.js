import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    all(params) {
        return client.get('products', params);
    },
    find(storeId) {
        return client.get(`products/${storeId}`);
    },
    search(storeId, id){
        return client.get(`products/${storeId}/${id}`);
    },
    getProduct(id){
        return client.get(`products/search/${id}`);
    },
    count(storeId) {
        return client.get(`products/count/${storeId}`);
    },
    create(data) {
        return client.post('products', data);
    },
    update(id, data) {
        return client.put(`products/${id}`, data);
    },
    delete(id) {
        return client.delete('products/${id}');
    },
};