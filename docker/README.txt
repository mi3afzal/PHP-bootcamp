

docker image build -t hellonode:v1 . 	// build image
docker run -d -p 80:8080 --name test1 hellonode:v1 	// run container
docker exec -it test1 /bin/sh 	// ssh into container


docker image build -t hellophp:v1 . 
docker run hellophp:v1  // it will just respond in console. and container will stop