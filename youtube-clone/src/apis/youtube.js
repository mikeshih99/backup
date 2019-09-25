import axios from 'axios';

const KEY = 'AIzaSyCdFgI6ML_il23be_lxKsk8_0GgcRC8BKQ';

export default axios.create({
    baseURL: 'https://www.googleapis.com/youtube/v3',
    params: {
        part: 'snippet',
        maxResults: 5,
        key: KEY
    }
});