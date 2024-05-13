export default (httpClient) => ({
    getUsers: async () => {
        const response = await httpClient.get("/all_users");

        return response;
    },
    getCurrentUser: async (userId) => {
        const response = await httpClient.get(`/user/${userId}`);

        return response;
    }
});
