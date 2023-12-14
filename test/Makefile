dockerContainerName=dasfasfas
dockerImageName=aasfasfasfas/fasfasfas
dockerImageTag=latest
envPath=./.env
dockerLogin=asgdsagsadgsda
dockerPassword=dckr_pat_sdgahsdfahfdhdshsdfgsdg
dockerVolumeName=sdgsasdfhsasadf
m ?= $(shell date +%Y-%m-%d)
c ?= $(shell date +%Y-%m-%d)
loginCommand:
	docker login --username $(dockerLogin) --password $(dockerPassword)
dockerBuild: #!delete and build image
	docker image rm $(dockerImageName):$(dockerImageTag) & docker build --no-cache -t $(dockerImageName):$(dockerImageTag) . 
dockerRun: #!run docker container
	docker run --name $(dockerContainerName) -v $(dockerVolumeName):/app --env-file $(envPath) --rm $(dockerImageName):$(dockerImageTag)
dockerStop: #!stop docker container
	docker stop $(dockerContainerName)
dockerPush: loginCommand #!push to docker
	docker push $(dockerImageName):$(dockerImageTag)
dockerGet: loginCommand #!pull from docker
	docker pull $(dockerImageName):$(dockerImageTag)
start:
	sudo systemctl start gasdgasdgas.service
stop:
	sudo systemctl stop gsdadgsagasd.service
status:
	systemctl status asdgsadgsadg.service
gf: # update
	eval $$(ssh-agent -s) && ssh-add ~/git && git fetch
gm: # update and get from git repo
	eval $$(ssh-agent -s) && ssh-add ~/git && git merge
gc: #!git commit
	git add . && git commit -m "$(c)" -m "" -m "Co-authored-by: test <test@test.test>"
gp: #!git push
	eval $$(ssh-agent -s) && ssh-add ~/cp/git && git push origin main
gpa: #!git commit && push
	eval $$(ssh-agent -s) && ssh-add ~/cp/accidev && git add . && git commit -m "$(c)" -m "" -m "Co-authored-by: test <test@test.test>" && git push origin main
# alembicinitialization: #! firs init alembic db
############ rm ./main.db & rm -r ./alembic & alembic init alembic -t async
############ cp ./test.py ./alembic/env.py
############ alembic revision --autogenerate -m "test"
############ alembic upgrade head
arevision:
	alembic revision --autogenerate -m "$(c)"
aupgrade:
	alembic upgrade head
adowngrade:
	alembic downgrade head
ccache:
	find . -type d -name "__pycache__" -exec rm -rf {} +
	find . -type f -name "*.pyc" -exec rm -f {} +
	find . -type f -name "*.pyo" -exec rm -f {} +
# cfiles:
# 	rm -r ./files
pinstall:
	pip install -r requirements.txt