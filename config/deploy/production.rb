############################################
# Production Server
############################################

set :stage, :production
set :stage_domain, "[add name for production]"
server "[add server name]", user: "[add deploy user]", roles: %w(web app db)
set :deploy_to, "/var/www/html"
set :shared_directory, "/var/www/html/shared"
set :current_directory, "/var/www/html/current"

############################################
# Setup Git
############################################

# Set the deploy branch to the current branch
set :branch, 'master'
