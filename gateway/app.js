const {ApolloServer} = require("apollo-server");
const {ApolloGateway, RemoteGraphQLDataSource} = require("@apollo/gateway");

const gateway = new ApolloGateway({
    serviceList: [
        {
            name: "service_a",
            url: "http://127.0.0.1:8080"
        },
        {
            name: "service_b",
            url: "http://127.0.0.1:8081"
        },
    ]
});

(async () => {
    const {schema, executor} = await gateway.load();

    const server = new ApolloServer({
        schema,
        executor
    });

    server.listen().then(({url}) => {
        console.log(`🚀 Server ready at ${url}`);
    });
})();