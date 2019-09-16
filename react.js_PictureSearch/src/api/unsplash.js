import axios from 'axios';

export default axios.create({
    baseURL: 'https://api.unsplash.com/',
    headers: {
        Authorization: 'Client-ID 1dfd092056dd9c27e5e1336574fdc5c7048cbea1b2d91e28a8361f1f0183a0e0'
    }
}); 