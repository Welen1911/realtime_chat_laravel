import axios from 'axios';
import users from "./users";
import messages from './messages';

const API_ENVS = {
    local: "http://127.0.0.1:8000",
  };

const httpClient = axios.create({
    baseURL: API_ENVS.local
});

export default {
    users: users(httpClient),
    messages: messages(httpClient),
}
