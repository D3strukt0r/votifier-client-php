==========================
Start using the Docker CLI
==========================

But there are more possible arguments for this.

.. code-block:: bash

   docker run -it \
       -p 25565:25565 \
       -v $(pwd)/data:/data \
       -e JAVA_MAX_MEMORY=1G \
       d3strukt0r/spigot

Explanation of the command
==========================

-e JAVA_MAX_MEMORY=1G
---------------------
This is the equivalent of :code:`-Xmx1G`. For the full list of environment variables refer to :ref:`arguments-overview`.

Running in the background
=========================

.. code-block:: bash

   docker run -d \
       -p 25565:25565 \
       -v $(pwd)/data:/data \
       -e JAVA_MAX_MEMORY=1G \
       d3strukt0r/spigot

As we aren't accessing the console now anymore, we can remove :code:`-it` and use :code:`-d` which stands for 'detached'.

But now you have a server running in the background which you can never access the console for.

Using "screen" for reaccessing the console
==========================================

Screen is a Linux program that acts like windows on your desktop, but for the console. So that you can close and open console "windows".

If it's not clear enough yet. This is only possible on Linux systems, not Windows.

Start by creating a screen and running a server inside:

.. code-block:: bash

   screen -d -m -S "spigot" \
       docker run -it \
           -p 25565:25565 \
           -v $(pwd)/data:/data \
           -e JAVA_MAX_MEMORY=1G \
           d3strukt0r/spigot

screen -d -m -S "spigot"
------------------------
You can detach from the window using :code:`CTRL` + :code:`a` and then :code:`d`.

To reattach first find your screen with :code:`screen -r`. And if you gave it a name, you can skip this.

Then enter :code:`screen -r spigot` or :code:`screen -r 00000.pts-0.office` (or whatever was shown with :code:`screen -r`)

IMPORTANT
=========
When configuring the server, you **HAVE TO** set the IP as follow:

.. code-block:: properties

    server-ip=0.0.0.0

And whatever you put in :code:`server-port=xxxxx` is what you will assing to :code:`-p 25565:xxxxx`
