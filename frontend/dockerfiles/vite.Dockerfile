FROM node:20-alpine

WORKDIR /app

RUN npm install -g create-vite

ENTRYPOINT ["create-vite"]
CMD ["."]
