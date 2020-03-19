==========================
Start using Docker Compose
==========================

Create a file called :code:`docker-compose.yml` under e. g. :code:`/opt/mc-server` and add:

.. code-block:: yaml

    version: '2'

    services:
      spigot:
        image: d3strukt0r/spigot
        ports:
          - 25565:25565
        volumes:
          - ./data:/data
        environment:
          - JAVA_MAX_MEMORY=1G

You can then run:

.. code-block:: bash

    docker-compose up

or to start detached (in the background):

.. code-block:: bash

    docker-compose up -d

Also here you could apply what you learned in the previous section about "screen".
