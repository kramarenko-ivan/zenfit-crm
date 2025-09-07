FROM node:20-alpine

WORKDIR /app

RUN apk add --no-cache bash build-base

ENV PATH="/app/node_modules/.bin:$PATH"