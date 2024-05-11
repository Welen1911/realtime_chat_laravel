export default (httpClient) => ({
    getMessages: async (userId) => {
        const response = await httpClient.get(`/messages/${userId}`);

        return response;
    },
    storeMessages: async (createMessage) => {
        const response = await httpClient.post('/messages', {
            ...createMessage
        });

        return response;
    }
});
