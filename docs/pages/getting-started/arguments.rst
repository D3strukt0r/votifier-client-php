.. _arguments-overview:

=====================
Overview of arguments
=====================

Environment Variables
=====================

- :code:`JAVA_MEMORY` - (Default: :code:`512M`) - Any integer followed by :code:`K` (Kilobyte), :code:`M` (Megabyte) or :code:`G` (Gigabyte)

  The Java memory heap size to specify to the JVM.

- :code:`JAVA_BASE_MEMORY` - (Default: :code:`${JAVA_MEMORY}`) - Any integer followed by :code:`K` (Kilobyte), :code:`M` (Megabyte) or :code:`G` (Gigabyte)

  Can be set to use a different initial heap size.

- :code:`JAVA_MAX_MEMORY` - (Default: :code:`${JAVA_MEMORY}`) - Any integer followed by :code:`K` (Kilobyte), :code:`M` (Megabyte) or :code:`G` (Gigabyte)

  Can be set to use a different max heap size.

- :code:`JAVA_OPTIONS` - (No default value) - Any :code:`java` arguments

  Additional -X options to pass to the JVM.

- :code:`EULA` - (Default: :code:`false`) - :code:`false`, :code:`true`

  Accept EULA before Spigot asks for it, for a smooth startup.

Volumes
=======

- :code:`/data` - (Recommended)

  Here go all data files, like: configs, plugins, logs, icons
