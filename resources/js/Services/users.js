export default (httpClient) => ({
    getUsers: async () => {
        const response = await httpClient.get("/all_users");

        return response;
    },
});
