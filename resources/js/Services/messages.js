export default (httpClient) => ({
    getMessages: async (userId) => {
        const response = await httpClient.get(`/messages/${userId}`);

        return response;
    },
});
