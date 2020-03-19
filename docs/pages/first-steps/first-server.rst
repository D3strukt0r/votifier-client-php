.. role:: bash(code)
   :language: bash

==========================
Creating your first server
==========================

Command
=======

To start a simple server use

.. code-block:: bash

   docker run -it -p 25565:25565 -v $(pwd)/data:/data d3strukt0r/spigot

Explanation of the command
==========================

-i -t
-----
This will let you work with the console inside your container. However, this will not let you leave but not re-enter the console, without shutting down the server. Later on, you'll learn a workaround for this.
To leave from the terminal, and let it run in the background click :code:`CTRL + P + Q` (lift from :code:`P` and click :code:`Q` while still holding :code:`CTRL`)

-p 25565:25565
--------------
This opens the internal port (inside the container) to the outer worlds. You can open as many ports for e. g. Votifier, RCON, etc. This would maybe look like :bash:`-p 25565:25565 -p 8192:8192`.

-v $(pwd)/\data:/data
---------------------
If you want to save your server somewhere, you need to link the directory inside your container to your host. Before the colon goes the place on your host. After the colon goes the directory inside the container, which is always :code:`/data`.

d3strukt0r/spigot
-----------------
This is the repository where the container is maintained. You can also specify what version you want to use. e. g. :bash:`d3strukt0r/spigot:latest` or :bash:`d3strukt0r/spigot:1.8.8`. For all versions check the `Tags on Docker Hub`_.

.. _`Tags on Docker Hub`: https://hub.docker.com/repository/docker/d3strukt0r/spigot/tags?page=1
