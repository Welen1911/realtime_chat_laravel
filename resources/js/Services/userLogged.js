export default (httpClient) => ({
    getUserLogged: async () => {
        const response = await httpClient.get("/me");

        return response;
    }
});
