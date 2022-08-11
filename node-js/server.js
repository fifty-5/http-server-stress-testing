const http = require("http");

const hostname = "0.0.0.0";
const port = 3000;

const fibonacci = (n) => {
  if (n <= 1) return n;
  return fibonacci(n - 1) + fibonacci(n - 2);
};

const server = http.createServer((req, res) => {
  const array = [];

  for (let i = 0; i < 20; i++) {
    array.push(fibonacci(i));
  }

  res.statusCode = 200;
  res.setHeader("Content-Type", "application/json");
  res.end(
    JSON.stringify({
      status: "success",
      results: array,
    })
  );
});

server.listen(port, hostname);
