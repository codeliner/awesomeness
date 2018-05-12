CREATE TABLE streams (
  stream_id UUID NOT NULL UNIQUE,
  stream_name text NOT NULL UNIQUE,
  deleted BOOLEAN NOT NULL,
  mark_deleted BOOLEAN NOT NULL,
  PRIMARY KEY (stream_name)
);

CREATE INDEX ON streams (mark_deleted);

CREATE TABLE events (
  event_id UUID NOT NULL,
  event_number BIGINT NOT NULL,
  event_type TEXT,
  data TEXT,
  meta_data TEXT,
  stream_id UUID NOT NULL,
  is_json BOOLEAN,
  updated CHAR(27),
  link_to UUID,
  PRIMARY KEY (stream_id, event_number)
);

CREATE UNIQUE INDEX ON events (stream_id, event_number);
CREATE INDEX ON events (event_id);

CREATE TABLE users (
    username VARCHAR(50) NOT NULL,
    full_name TEXT NOT NULL,
    password_hash TEXT NOT NULL,
    disabled BOOLEAN NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE user_roles (
    rolename VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL
);

CREATE INDEX ON user_roles (username);
CREATE INDEX ON user_roles (rolename);

CREATE TABLE stream_acl (
    stream_id UUID NOT NULL,
    operation smallint NOT NULL,
    role VARCHAR(50),
    PRIMARY KEY (stream_id, operation, role)
);

CREATE TABLE projections (
    projection_name TEXT PRIMARY KEY,
    projection_id CHAR(32) NOT NULL
);

INSERT INTO users (username, full_name, password_hash, disabled) VALUES
    ('admin', 'Event Store Administrator', '$2y$10$z0a0JV9SByKIeeDy4lXjGuHPpCgXcd5WYS/Hps3.dow28SvqnfGAS', false),
    ('ops', 'Event Store Operations', '$2y$10$eI5BgCvXMUdMoynwyF1PguKpzL9lWSK7GSDt71jOaRyOwrXG70N46', false);
INSERT INTO user_roles (rolename, username) VALUES
    ('$admins', 'admin'),
    ('$ops', 'ops');
INSERT INTO streams (stream_id, stream_name, deleted, mark_deleted) VALUES
    ('eb2686af-a164-4fd4-9de1-1c830abab796', '$projections-$streams', false, false),
    ('f385823c-3a15-4bf5-b775-540c9f359e20', '$projections-$stream_by_category', false, false),
    ('17818667-726e-4815-9d14-968c88e85fcd', '$projections-$by_category', false, false),
    ('27ede519-046e-472b-ada7-497af013a06f', '$projections-$by_event_type', false, false);
INSERT INTO projections (projection_name, projection_id) VALUES
    ('$streams', '2eca01afe77e497b82cd60d8804bcd7d'),
    ('$stream_by_category', '8128b078465d493b84ebf643bce6c0f5'),
    ('$by_category', '3ef042a59e4747898955b39db8c5e4a1'),
    ('$by_event_type', '7cf319276a8340e9abafa4df7aa60e5c');
INSERT INTO events (event_id, event_number, event_type, data, meta_data, stream_id, is_json, updated) VALUES
    ('5b6f0887-0ff4-4e59-b185-0a61dee10489', 0, '$ProjectionUpdated', '{"handlerType":"PHP","query":"","mode":"Continuous","sourceDefinition":{"allEvents":true,"allStreams":true,"categories":[],"events":[],"streams":[],"options":{"definedFold":true,"includeLinks":true}},"emitEnabled":true,"checkpointsDisabled":false,"trackEmittedStreams":false,"runAs":{"name":"$system"},"checkpointHandledThreshold":4000,"checkpointUnhandledBytesThreshold":10000000,"pendingEventsThreshold":5000,"maxWriteBatchLength":500}', '', 'eb2686af-a164-4fd4-9de1-1c830abab796', true, '2018-04-28T08:04:06.512675Z'),
    ('62169efe-6826-4c90-8567-c08d66d1f7ee', 0, '$ProjectionUpdated', '{"handlerType":"PHP","query":"","mode":"Continuous","sourceDefinition":{"allEvents":true,"allStreams":true,"categories":[],"events":[],"streams":[],"options":{"definedFold":true,"includeLinks":true}},"emitEnabled":true,"checkpointsDisabled":false,"trackEmittedStreams":false,"runAs":{"name":"$system"},"checkpointHandledThreshold":4000,"checkpointUnhandledBytesThreshold":10000000,"pendingEventsThreshold":5000,"maxWriteBatchLength":500}', '', 'f385823c-3a15-4bf5-b775-540c9f359e20', true, '2018-04-28T08:04:06.512675Z'),
    ('0e76d92f-18ed-44db-89c8-a15fdff9070b', 0, '$ProjectionUpdated', '{"handlerType":"PHP","query":"","mode":"Continuous","sourceDefinition":{"allEvents":true,"allStreams":true,"categories":[],"events":[],"streams":[],"options":{"definedFold":true,"includeLinks":true}},"emitEnabled":true,"checkpointsDisabled":false,"trackEmittedStreams":false,"runAs":{"name":"$system"},"checkpointHandledThreshold":4000,"checkpointUnhandledBytesThreshold":10000000,"pendingEventsThreshold":5000,"maxWriteBatchLength":500}', '', '17818667-726e-4815-9d14-968c88e85fcd', true, '2018-04-28T08:04:06.512675Z'),
    ('32ba7716-50de-447e-ad99-e55182d5b80b', 0, '$ProjectionUpdated', '{"handlerType":"PHP","query":"","mode":"Continuous","sourceDefinition":{"allEvents":true,"allStreams":true,"categories":[],"events":[],"streams":[],"options":{"definedFold":true,"includeLinks":true}},"emitEnabled":true,"checkpointsDisabled":false,"trackEmittedStreams":false,"runAs":{"name":"$system"},"checkpointHandledThreshold":4000,"checkpointUnhandledBytesThreshold":10000000,"pendingEventsThreshold":5000,"maxWriteBatchLength":500}', '', '27ede519-046e-472b-ada7-497af013a06f', true, '2018-04-28T08:04:06.512675Z');

-- @todo write user stream acl into event-store
-- @todo make this a script executed from php (setup_event_store.php)
